<?php

namespace app\Controllers;

use DateTime;
use Exception;
use app\Models\Post;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        try {
            $page = $request->query->getInt('page', 1);
            $perPage = $request->query->getInt('perPage', 20);

            $offset = ($page - 1) * $perPage;

            $posts = Post::findPaginated($offset, $perPage);

            $totalPosts = Post::count();

            $results = array_map(function ($post) {
                return $post->toArray();
            }, $posts);

            return $this->jsonResponse([
                'data' => $results,
                'pagination' => [
                    'currentPage' => $page,
                    'perPage' => $perPage,
                    'totalItems' => $totalPosts,
                    'totalPages' => ceil($totalPosts / $perPage)
                ]
            ]);
        } catch (Exception $e) {
            return $this->jsonResponse([
                'message' => 'An error occurred while fetching posts: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $post = Post::findById($id);

            return $this->jsonResponse([
                'data' => $post,
            ]);
        } catch (Exception $e) {
            return $this->jsonResponse([
                'message' => 'An error occured while fetching post {$id} ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $content = $request->getContent();
            $data = json_decode($content, true);

            if (!isset($data['title']) || !isset($data['body']) || !isset($data['author'])) {
                throw new Exception("Fields are missing.");
            }

            $title = filter_var($data['title'], FILTER_SANITIZE_SPECIAL_CHARS);
            $body = filter_var($data['body'], FILTER_SANITIZE_SPECIAL_CHARS);
            $author = filter_var($data['author'], FILTER_SANITIZE_SPECIAL_CHARS);

            if ($title === '' || $body === '' || $author === '') {
                throw new Exception("Fields are missing.");
            }

            $now = new DateTime();

            Post::create([
                'title' => $title,
                'body' => $body,
                'author' => $author,
                'created_at' => $now,
                'updated_at' => $now
            ]);

            return $this->jsonResponse('Post successfully created.');
        } catch (Exception $e) {
            return $this->jsonResponse("An error occured while creating your post : " . $e->getMessage());
        }
    }


    public function update(Request $request, int $id): JsonResponse
    {
        try {
            $post = Post::findById($id);
            if (!$post) {
                throw new Exception("post not found", 404);
            }

            $content = $request->getContent();
            $data = json_decode($content, true);

            if (!isset($data['title']) || !isset($data['body']) || !isset($data['author'])) {
                throw new Exception("Fields are missing.");
            }

            $data = [
                'title' => filter_var($data['title'], FILTER_SANITIZE_SPECIAL_CHARS),
                'body' => filter_var($data['body'], FILTER_SANITIZE_SPECIAL_CHARS),
                'author' => filter_var($data['author'], FILTER_SANITIZE_SPECIAL_CHARS)
            ];

            if ($post->update($data, $id)) {
                return $this->jsonResponse('Post updated successfully.');
            } else {
                throw new Exception('Failed to update record', 500);
            }
        } catch (Exception $e) {
            return $this->jsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $post = Post::findById($id);
            if (!$post) {
                throw new Exception('Post not found', 404);
            }
            Post::delete($id);

            return $this->jsonResponse('Post successfully deleted.');
        } catch (Exception $e) {
            return $this->jsonResponse(['error' => $e->getMessage()], 500);
        }
    }
}

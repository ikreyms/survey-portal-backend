<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\IslandDto;
use App\Http\Controllers\Controller;
use App\Models\Island;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IslandController extends Controller
{
    // public function index(Request $request)
    // {
    //     $perPage = $request->input('rowsPerPage', 10);
    //     $page = $request->input('page', 1);
    //     $sortBy = $request->input('sortBy', 'id');
    //     $descending = $request->boolean('descending', false);

    //     $filter = $request->input('filter', []);

    //     $search = $filter['search'] ?? null;
    //     $categories = $filter['categories'] ?? null;

    //     $query = Island::with(['atoll', 'category']);

    //     if ($search && $categories) {
    //         $query->where('name', 'like', "%{$search}%")
    //             ->orWhere('f_code', 'like', "%{$search}%");
    //         $query->whereHas('category', function ($query) use ($categories) {
    //             $query->whereIn('name', explode(',', $categories));
    //         });

    //     } else {
    //         if ($search) {
    //             $query->where('name', 'like', "%{$search}%")
    //                 ->orWhere('f_code', 'like', "%{$search}%");
    //         }
    //         if ($categories) {
    //             $query->whereHas('category', function ($query) use ($categories) {
    //                 $query->whereIn('name', explode(',', $categories));
    //             });
    //         }
    //     }

    //     $query->orderBy($sortBy, $descending ? 'desc' : 'asc');

    //     $paginator = $query->paginate($perPage, ['*'], 'page', $page);

    //     return response()->json(IslandDto::collect($paginator));
    // }

    public function show(string $fCode)
    {
        $island = Island::with(['atoll', 'category'])->where('f_code', $fCode)->first();
        if (!$island)
            throw new NotFoundHttpException();
        return IslandDto::from($island);
    }

    public function index(Request $request)
    {
        $perPage = $request->integer('rowsPerPage', 10);
        $page = $request->integer('page', 1);
        $sortBy = $request->input('sortBy', 'id');
        $descending = $request->boolean('descending', false);

        $filter = $request->input('filter', []);

        $search = $filter['search'] ?? null;
        $categories = $filter['categories'] ?? null;

        $query = Island::with(['atoll', 'category']);

        // Apply search filter (grouped properly so OR doesn't break)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('f_code', 'like', "%{$search}%");
            });
        }

        // Apply category filter (stacks with search)
        if ($categories) {
            $categoriesArray = array_map('trim', explode(',', $categories));
            $query->whereHas('category', function ($q) use ($categoriesArray) {
                $q->whereIn('name', $categoriesArray); // or id if you switch
            });
        }

        // Sorting
        $query->orderBy($sortBy, $descending ? 'desc' : 'asc');

        // Pagination
        $paginator = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json(IslandDto::collect($paginator));
    }
}

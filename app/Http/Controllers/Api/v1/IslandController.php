<?php

namespace App\Http\Controllers\Api\v1;

use App\Dtos\v1\IslandDto;
use App\Http\Controllers\Controller;
use App\Models\Island;
use Illuminate\Http\Request;

class IslandController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('rowsPerPage', 10);
        $page = $request->input('page', 1);
        $sortBy = $request->input('sortBy', 'id');
        $descending = $request->boolean('descending', false);

        $query = Island::with(['atoll', 'category']);

        // search filter
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('f_code', 'like', "%{$search}%");
        }

        // sorting
        $query->orderBy($sortBy, $descending ? 'desc' : 'asc');

        $paginator = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json(IslandDto::collect($paginator));
    }
    // public function index(Request $request)
    // {
    //     // return Island::all();
    //     //
    //     // return IslandDto::collect(Island::get());
    //     return Island::with(['atoll', 'category'])->get();
    // }

    public function show(string $fCode)
    {
        return IslandDto::from(Island::find(['f_code' => $fCode]));
    }
}

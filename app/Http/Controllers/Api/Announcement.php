<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Announcement as Annonce;
use App\Http\Resources\AnnouncementsRessource;

class Announcement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="http://127.0.0.1:8000/api/announcements/all",
     *      operationId="getAllannouncements/",
     *      tags={"INDEX"},

     *      summary="Get List Of announcements",
     *      description="Returns all announcements",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function index()
    {
        //
        $data = [];
        $data["annoncements"] = Annonce::all();

        return $data["annoncements"];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cle = '1234567';
        if (($request->header('X_Key') == null) || ($request->header('X_Product_Key')  != $cle)) {
            return response()->json([
                'statut' => 'error',
                'message' => 'authorisation non valide',
                'code' => 'A_201',
                'data' => null
            ]);
        }

        $data = [
            'lib' => $request->lib,
            'description' => $request->description,
        ];
        $response = Annonce::create($data);

        return response()->json([
            'statut' => 'success',
            'message' => 'Annonce créer avec success',
            'code' => 'A_200',
            'data' => $response
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Get(
     *      path="http://127.0.0.1:8000/api/announcements/get/id",
     *      operationId="get Announcements/",
     *      tags={"SHOW"},

     *      summary="Avoir une annonce",
     *      description="retourne une annonce",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */
    public function show($id)
    {
        //
        $response = Annonce::find($id);
        if ($response) {
            $data = new AnnouncementsRessource($response);
            return response()->json([
                'status' => 'success',
                'code' => 'A_200',
                'data' => $data
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'ID introuvable',
            'code' => 'A_201',
            'data' => null
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = Annonce::find($id);
        $data = [
            'lib' => $request->lib,
            'description' => $request->description,
        ];
        if ($response) {
            $response = $response->update($data);
            return response()->json([
                'status' => 'success',
                'code' => 'A_200',
                'data' => $response
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'ID introuvable',
            'code' => 'A_201',
            'data' => false
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $response = Annonce::find($id);

        if ($response) {
            $response = $response->delete();
            return response()->json([
                'status' => 'success',
                'code' => 'A_200',
                'data' => $response
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'ID introuvable',
            'code' => 'A_201',
            'data' => false
        ]);
    }
}

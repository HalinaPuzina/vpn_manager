<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AjaxController extends Controller
{

    //

    public function updateCompany(Request $request, $id)
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', $request->root() . '/api/companies/' . $id, [
            'form_params' => $request->all()
        ]);

        $res = $response->getStatusCode();
        if ($res == 200) {
            flash('Succsess');
        } else {
            flash($response->getBody()->getContents());
        }
        return back();
    }

    public function createCompany(Request $request)
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $request->root() . '/api/companies/create', [
            'form_params' => $request->all()
        ]);

        $res = $response->getStatusCode();
        if ($res == 201) {
            flash('Succsess');
        } else {
            flash($response->getBody()->getContents());
        }
        return back();
    }

    public function deleteCompany(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('DELETE', $request->root() . '/api/companies/' . $id, [
            'form_params' => []
        ]);

        $res = $response->getStatusCode();
        if ($res == 204) {
            flash('Succsess');
        } else {
            flash($response->getBody()->getContents());
        }
        return back();
    }
    
    
    public function updateUser(Request $request, $id)
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request('PUT', $request->root() . '/api/users/' . $id, [
            'form_params' => $request->all()
        ]);

        $res = $response->getStatusCode();
        if ($res == 200) {
            flash('Succsess');
        } else {
            flash($response->getBody()->getContents());
        }
        return back();
    }
    
    public function createUser(Request $request)
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $request->root() . '/api/users/create', [
            'form_params' => $request->all()
        ]);

        $res = $response->getStatusCode();
        if ($res == 201) {
            flash('Succsess');
        } else {
            flash($response->getBody()->getContents());
        }
        return back();
    }
    
        public function deleteUser(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('DELETE', $request->root() . '/api/users/' . $id, [
            'form_params' => []
        ]);

        $res = $response->getStatusCode();
        if ($res == 204) {
            flash('Succsess');
        } else {
            flash($response->getBody()->getContents());
        }
        return back();
    }

}

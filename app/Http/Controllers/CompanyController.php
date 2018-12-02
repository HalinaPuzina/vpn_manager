<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Validator;

/**
 * Class CompanyController
 *
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /*
     * get all companies
     * @return Collection
     */

    public function index()
    {
        return Company::all();
    }

    /*
     * get all companies applicattion
     */

    public function lists()
    {
        $companies = Company::getList();
        return view('companies', ['companies' => $companies]);
    }

    /*
     * edit company
     */

    public function edit($id)
    {
        $company = Company::find($id);
        return view('company-edit', ['company' => $company]);
    }
    
    /*
     * new company
     */
        public function newCompany()
    {
        return view('company-create');
    }

    /*
     * get one company
     * @param int $id
     * @return Collection
     */

    public function show($id)
    {
        return Company::find($id);
    }

    /**
     * Create company
     * @param Request $request
     * @return json
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'qouta' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $company = Company::create($request->all());

        return response()->json($company, 201);
    }

    /**
     * Update company
     *
     * @param Request $request
     * @param int $id
     * @return json
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
                    'qouta' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $company = Company::find($id);
        if (!$company) {
            return response()->json('This company does not exist', 404);
        }
        $company->update($request->all());

        return response()->json($company, 200);
    }

    /**
     * Delete company
     *
     * @param Request $request
     * @param int $id
     * @return json
     */
    public function delete( $id)
    {
        $company = Company::find($id);
        if (!$company) {
            return response()->json('This company does not exist', 404);
        }
        $company->delete();

        return response()->json(null, 204);
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesApiController extends Controller
{
    public function index() {
        return Company::all();
    }
    
    public function store() {
        request()->validate ([
            'first_name' => 'required', 
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'abn_number' => 'required',
            'organisation_name' => 'required',
            'state' => 'required',
            'po_number' => 'required',
            'is_gst' => 'required'
            ]);
            
            return Company::create([
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'email' => request('email'),
                'password' => request('password'),
                'abn_number' => request('abn_number'),
                'organisation_name' => request('organisation_name'),
                'state' => request('state'),
                'po_number' => request('po_number'),
                'is_gst' => request('is_gst'),
                ]);   
            }
            
            public function update(Company $company) {
                request()->validate([
                    'first_name' => 'required', 
                    'last_name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                    'abn_number' => 'required',
                    'organisation_name' => 'required',
                    'state' => 'required',
                    'po_number' => 'required',
                    'is_gst' => 'required'
                    ]);
                    
                    $success = $company->update([
                        'first_name' => request('first_name'),
                        'last_name' => request('last_name'),
                        'email' => request('email'),
                        'password' => request('password'),
                        'abn_number' => request('abn_number'),
                        'organisation_name' => request('organisation_name'),
                        'state' => request('state'),
                        'po_number' => request('po_number'),
                        'is_gst' => request('is_gst'),
                        ]);
                        
                        return [
                            'success' => $success
                        ];
                    }
                    
                    public function destroy(Company $company)
                    {
                        $success = $company->delete();
                        
                        return [
                            'success' => $success
                        ];
                    }
                }
                
<?php
namespace App\Http\Controllers;

use App\Exceptions\ValidationException;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestfulController extends Controller
{

    private   $statusCode      = 200;
    protected $inputRequest;
    protected $rules           = [];
    protected $nameInputParams = [];

    /**
     * Get value of specific parameters
     *
     * @param Request $request
     *
     * @return array
     */
    public function getInput(Request $request)
    {
        $this->inputRequest = $request->only($this->nameInputParams);

        return $this->inputRequest;
    }

    /**
     * Validate the given request with the given rules.
     *
     * @param array $messages
     *
     * @throws \App\Exceptions\ValidationException
     */
    public function validator(array $messages = [])
    {
        $validator = Validator::make($this->inputRequest, $this->rules);

        if (!$messages)
        {
            $messages = $validator->messages();
        }

        if ($validator->fails())
        {
            throw new ValidationException($messages);
        }
    }

    /**
     * Format API response
     *
     * @param  array $data
     *
     * @return array
     */
    public function formatApi($data)
    {
        return [
            'status' => 'success',
            'result' => $data,
        ];
    }

    /**
     * Response api in JSON/XML/Plaintext
     *
     * @param $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseApi($data = '')
    {
        return response()->json($this->formatApi($data), $this->statusCode);
    }
}
<?php


namespace App\Http\Requests;


use App\Utils\DataTypeUtil;
use App\Utils\ResponseUtil;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(ResponseUtil::error($validator->errors()->all()[0]));
    }

    /**
     * Transform input value to string.
     * @param string $key
     * @return string
     */
    public function getInputAsString(string $key): string {
        return DataTypeUtil::toString($this->input($key));
    }

    /**
     * Transform input value to int.
     * @param string $key
     * @return int
     */
    public function getInputAsInt(string $key): int {
        return DataTypeUtil::toInt($this->input($key));
    }

    /**
     * Transform input value to float.
     * @param string $key
     * @return float
     */
    public function getInputAsFloat(string $key): float {
        return DataTypeUtil::toFloat($this->input($key));
    }

    /**
     * Transform input value to boolean.
     * @param string $key
     * @return bool
     */
    public function getInputAsBoolean(string $key): bool {
        return DataTypeUtil::toBoolean($this->input($key));
    }

    /**
     * Transform input value to array.
     * @param string $key
     * @return array
     */
    public function getInputAsArray(string $key): array {
        return DataTypeUtil::toArray($this->input($key));
    }
}

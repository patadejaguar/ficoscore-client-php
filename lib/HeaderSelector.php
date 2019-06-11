<?php
/**
 * ApiException
 * PHP version 5
 *
 * @category Class
 * @package  APIHub\Client
 * @author   APIHub Codegen team
 * @link     https://github.com/apihub-api/apihub-codegen
 */

/**
 * FICO Score
 *
 * La API para FICO Score calcula el Score de la persona consultada.
 *
 * OpenAPI spec version: 0.0.0
 * 
 * Generated by: https://github.com/apihub-api/apihub-codegen.git
 * APIHub Codegen version: 2.4.2
 */

/**
 * NOTE: This class is auto generated by the apihub code generator program.
 * https://github.com/apihub-api/apihub-codegen
 * Do not edit the class manually.
 */

namespace APIHub\Client;

use \Exception;

class HeaderSelector
{

    public function selectHeaders($accept, $contentTypes)
    {
        $headers = [];

        $accept = $this->selectAcceptHeader($accept);
        if ($accept !== null) {
            $headers['Accept'] = $accept;
        }

        $headers['Content-Type'] = $this->selectContentTypeHeader($contentTypes);
        return $headers;
    }

    public function selectHeadersForMultipart($accept)
    {
        $headers = $this->selectHeaders($accept, []);

        unset($headers['Content-Type']);
        return $headers;
    }

    private function selectAcceptHeader($accept)
    {
        if (count($accept) === 0 || (count($accept) === 1 && $accept[0] === '')) {
            return null;
        } elseif (preg_grep("/application\/json/i", $accept)) {
            return 'application/json';
        } else {
            return implode(',', $accept);
        }
    }

    private function selectContentTypeHeader($contentType)
    {
        if (count($contentType) === 0 || (count($contentType) === 1 && $contentType[0] === '')) {
            return 'application/json';
        } elseif (preg_grep("/application\/json/i", $contentType)) {
            return 'application/json';
        } else {
            return implode(',', $contentType);
        }
    }
}
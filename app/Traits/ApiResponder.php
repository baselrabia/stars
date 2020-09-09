<?php

namespace App\Traits;

trait ApiResponder
{
        protected $statusCode = 200;
        /**
         * Getter for statusCode
         *
         * @return int
         */
        public function getStatusCode()
        {
            return $this->statusCode;
        }
        /**
         * Setter for statusCode
         *
         * @param int $statusCode Value to set
         *
         * @return self
         */
        public function setStatusCode($statusCode)
        {
            $this->statusCode = $statusCode;
            return $this;
        }
        protected function respond($data, $headers = [])
        {
            return response()->json($data, $this->statusCode, $headers);
        }
        public function respondWithItem($item, $message = 'Resource message')
        {
            return $this->respond([
                'http_code' => $this->getStatusCode(),
                'data' => $item,
                'message' => $message,
            ]);
        }
        public function respondWithCollection($collection)
        {
            return $this->respond([
                'http_code' => $this->getStatusCode(),
                'data' => $collection
            ]);
        }
        public function respondWithMessage($message)
        {
            return $this->setStatusCode(200)
                ->respond([
                    'http_code' => $this->getStatusCode(),
                    'message' => $message
                ]);
        }
        public function respondNoContent($message = 'No content')
        {
            return $this->setStatusCode(204)
                ->respond([
                    'http_code' => $this->getStatusCode(),
                    'message' => $message
                ]);
        }
        public function respondCreated($data, $message = 'Resource created successfully')
        {
            return $this->setStatusCode(201)
                ->respond([
                    'http_code' => $this->getStatusCode(),
                    'data' => $data,
                    'message' => $message
                ]);
        }
        protected function respondWithError($message)
        {
            if (!is_array($message)) {
                $message = [
                    'body' => [$message]
                ];
            }
            return $this->respond([
                'http_code' => $this->getStatusCode(),
                'error' => [
                    'message' => $message,
                ]
            ]);
        }
        /**
         * Generates a Response with a 403 HTTP header and a given message.
         *
         * @return Response
         */
        public function errorForbidden($message = 'Forbidden')
        {
            return $this->setStatusCode(403)
                ->respondWithError($message);
        }
        /**
         * Generates a Response with a 500 HTTP header and a given message.
         *
         * @return Response
         */
        public function errorInternalError($message = 'Internal Error')
        {
            return $this->setStatusCode(500)
                ->respondWithError($message);
        }
        /**
         * Generates a Response with a 404 HTTP header and a given message.
         *
         * @return Response
         */
        public function errorNotFound($message = 'Resource Not Found')
        {
            return $this->setStatusCode(404)
                ->respondWithError($message);
        }
        /**
         * Generates a Response with a 401 HTTP header and a given message.
         *
         * @return Response
         */
        public function errorUnauthorized($message = 'Unauthorized')
        {
            return $this->setStatusCode(401)
                ->respondWithError($message);
        }
        /**
         * Generates a Response with a 400 HTTP header and a given message.
         *
         * @return Response
         */
        public function errorWrongArgs($message = 'Wrong Arguments')
        {
            return $this->setStatusCode(400)
                ->respondWithError($message);
        }
}

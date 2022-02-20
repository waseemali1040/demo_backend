<?php


namespace App\libs\Response;


class GlobalApiResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $outcome = 'SUCCESS';
    /**
     * @var int
     */
    private $outcomeCode = 0;
    /**
     * @var string
     */
    private $message = '';
    /**
     * @var int
     */
    private $numOfRecords = 0;
    /**
     * @var \stdClass
     */
    private $records;
    /**
     * @var array
     */
    private $errors = [];

    public function success($message = '', $numOfRecords = 0, $records = [])
    {
        $this->setResponse(
            GlobalApiResponseCodeBook::SUCCESS['outcome'],
            GlobalApiResponseCodeBook::SUCCESS['outcomeCode'],
            $message,
            $numOfRecords,
            $records ?: new \stdClass(), []
        );
        return $this;
    }
    public function error(array $outcomeArray, $message, $errors = [])
    {
        $this->setResponse(
            $outcomeArray['outcome'],
            $outcomeArray['outcomeCode'],
            $message,
            0,
            new \stdClass(),
            $errors
        );
        return $this;
    }
    private function setResponse($outcome, $outcomeCode, $message, $numOfRecords = 0, $records = [], $errors = [])
    {

        $this->outcome = $outcome;
        $this->outcomeCode = $outcomeCode;
        $this->message = $message;
        $this->numOfRecords = $numOfRecords;
        $this->records = $records ?: new \stdClass();
        $this->errors = $errors;

        return $this;
    }

        function jsonSerialize()
        {
            return [
                '_metadata' => [
                    'outcome' => $this->outcome,
                    'outcomeCode' => $this->outcomeCode,
                    'numOfRecords' => $this->numOfRecords,
                    'message' => $this->message,
                    ],
                'records' => $this->records ?: new \stdClass(),
                'errors' => $this->errors,
            ];
        }

}

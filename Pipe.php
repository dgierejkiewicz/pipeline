<?php

class Pipeline
{

    /**
     * Stages
     * @var type
     */
    private $stages = [];

    /**
     * Konstruktor
     */
    public function __construct()
    {

    }

    /**
     * Zwraca instancję pipeline
     * @param callable $stage
     * @return \self
     */
    public function pipe(callable $stage)
    {
        $stages = $this->stages;
        $stages[] = $stage;
        $pipeline = new self();
        $pipeline->stages = $stages;
        return $pipeline;
    }

    /**
     * Przetwarza kolejne etapy
     * @return type
     */
    public function process($payload)
    {
        if(null != $payload) {
            foreach ($this->stages as $stage) {
                if(is_callable($stage)) {
                    $payload = is_array($payload) ? array_map($stage, $payload) : $stage($payload);
                }
            }
            return $payload;
        } else {
            throw new Exception('No payload exception');
        }

    }

}

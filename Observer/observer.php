<?php

namespace DesignPatterns\Observer;

interface EventManager{
    public function subscribe($eventType, $listener);
    public function unsubscribe($eventType, $listener);
    public function notify($eventType, $data);
}

class ConcretEventManager implements EventManager
{
    private $listeners = [];

    public function subscribe($eventType, $listener)
    {
        $this->listeners[$eventType][] = $listener;
    }

    public function unsubscribe($eventType, $listener)
    {
        $key = array_search($listener, $this->listeners[$eventType]);
        if($key !== false){
            unset($this->listeners[$eventType][$key]);
        }
    }

    public function notify($eventType, $data)
    {
        if(!empty($this->listeners[$eventType])){
            foreach($this->listeners[$eventType] as $listener){
                $listener->update($data);
            }
        }
    }
}

class Editor
{
    public $eventManager;
    private $file;

    public function __construct(EventManager $eventManater)
    {
        $this->eventManager = $eventManater;
    }

    public function openFile($fileName)
    {
        $this->file = fopen($fileName, "w+");
        $this->eventManager->notify("open", $fileName);
    }

    public function writeFile($text)
    {
        fwrite($this->file, $text);
        fclose($this->file);
        $this->eventManager->notify("wrote", $text);
    }
}

interface EventListener
{
    public function update($data);
}

class GustavoLog implements EventListener
{
    public function update($data)
    {
        echo "Happened: ".$data."\n\n";
    }
}
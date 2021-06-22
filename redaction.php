<?php

final class Redaction
{
    /** @var array */
    private $files;

    /** @var string */
    private $regexp;

    /** @var string */
    private $temp;

    /** @var string */
    private $archive;

    /**
     * @param  array $files $_FILES
     * @return void
     */
    public function __construct(array $files)
    {
        $this->temp = 'temp';
        $this->files = $files['files'];
        $this->regexp = '/"vpn":{"blacklisted_locations":\[([a-zA-Z",]+)\],"last_established_location":([a-zA-Z",]+)/';

        if (!file_exists($this->temp)) {
            mkdir($this->temp, 0755);
        }
    }

    /**
     * Удаление архива
     * 
     * @return void
     */
    public function __destruct()
    {
        if (file_exists($this->getArchive())) {
            unlink($this->getArchive());
        }
    }

    /**
     * Генерация архива
     * 
     * @return self
     * @throws \Exception
     */
    public function generate(): self
    {
        $this->archive = 'opera_vpn__' . time() . '.zip';

        $zip = new ZipArchive();

        if ($zip->open(sprintf('%s/%s', $this->temp, $this->archive), ZipArchive::CREATE) !== true) {
            throw new \Exception('Невозможно создать ZIP архив');
        }

        foreach ($this->files['tmp_name'] as $index => $tmp) {
            $content = file_get_contents($tmp);
            if (preg_match($this->regexp, $content)) {
                $content = preg_replace($this->regexp, '"vpn":{"blacklisted_locations":["cn"],"last_established_location":"CN"', $content);
                $zip->addFromString($this->files['name'][$index], $content);
            }
        }

        $zip->close();

        return $this;
    }

    /**
     * Проверка файлов на соответствие
     * 
     * @param  string[] $valid
     * @return self
     */
    public function validate(array $valid): self
    {
        foreach ($this->files['name'] as $name) {
            if (!in_array($name, $valid)) {
                throw new \Exception('Загрузите файлы, указанные в описании');
            }
        }

        foreach ($this->files['type'] as $type) {
            if ($type !== 'application/octet-stream') {
                throw new \Exception('Загружены явно не те файлы');
            }
        }

        return $this;
    }

    /**
     * Загрузка архива
     * 
     * @return void
     */
    public function download(): void
    {
        header('Content-Type: application/force-download');
        header('Content-Disposition: inline; filename="' . $this->archive . '"');
        readfile($this->getArchive());

        $this->__destruct();
    }

    /**
     * Путь до архива
     * 
     * @return string
     */
    private function getArchive(): string
    {
        return sprintf('%s/%s', $this->temp, $this->archive);
    }
}


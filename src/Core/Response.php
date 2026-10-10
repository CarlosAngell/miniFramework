<?php

namespace App\Core;

class Response
{
    /**
     * Define o código de status HTTP (ex: 200, 404, 500)
     */
    public function status(int $code): self
    {
        http_response_code($code);
        return $this;
    }

    /**
     * Define um cabeçalho HTTP
     */
    public function header(string $key, string $value): self
    {
        header("{$key}: {$value}");
        return $this;
    }

    /**
     * Envia resposta JSON padronizada
     */
    public function json(array $data, int $status = 200): void
    {
        $this->status($status);
        $this->header('Content-Type', 'application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }

    /**
     * Envia texto puro
     */
    public function text(string $message, int $status = 200): void
    {
        $this->status($status);
        $this->header('Content-Type', 'text/plain; charset=utf-8');
        echo $message;
        exit;
    }

    /**
     * Redireciona para outra URL
     */
    public function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}

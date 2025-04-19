<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // public function toArray(Request $request): array
    // {
    //     return [
    //         'id' => $this->id,
    //         'name' => $this->name,
    //         'price' => $this->price,
    //         'nilai' => $this->nilai,
    //         'image' => $this->image,
    //         'saldo_awal' => $this->saldo_awal,
    //         'saldo_akhir' => $this->saldo_akhir,
    //         'category_id' => $this->category_id,
    //         'nilai_rupiah' => $this->nilai_rupiah,
    //         'created_at' => $this->created_at,
    //         'updated_at' => $this->updated_at,
    //     ];
    // }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'nilai' => $this->nilai,
            'image' => $this->image,
            'saldo_awal' => $this->saldo_awal,
            'saldo_akhir' => $this->saldo_akhir,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

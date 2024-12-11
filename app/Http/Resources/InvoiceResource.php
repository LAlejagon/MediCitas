<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'invoice_number' => $this->invoice_number,
            'issue_date' => $this->issue_date,
            'customer_name' => $this->customer_name,
            'details' => $this->details,
            'total' => $this->total,
            'signature' => $this->signature,
        ];
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantDocuments extends Model {

    public $timestamps = false;
    protected $table = 'tenants_documents';
    protected $fillable = ['tenant_id', 'url', 'rent_id'];

    public function tenant() {
        return $this->belongsTo('App\Tenant');
    }

}

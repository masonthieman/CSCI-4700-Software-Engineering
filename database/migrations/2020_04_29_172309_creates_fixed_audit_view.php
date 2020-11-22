<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesFixedAuditView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::STATEMENT("
            CREATE VIEW vw_audit_records AS
            SELECT ae.recorded, ae.uid, ae.txid, 
                CASE COALESCE(att.label, '')
                    WHEN '' THEN af.table_schema
                    ELSE CONCAT(att.label, table_schema)
                END AS description,
                af.table_name, af.table_schema, af.column_name, ae.pk_vals, ae.row_op AS op, ae.old_value, ae.new_value
                FROM tb_audit_events AS ae INNER JOIN tb_audit_fields AS af ON ae.audit_field = af.audit_field
                LEFT JOIN tb_audit_transaction_types AS att
                ON att.audit_transaction_type = ae.audit_transaction_type
                ORDER BY ae.recorded DESC, af.table_name, af.column_name;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

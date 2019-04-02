<?php

use Illuminate\Database\Seeder;
use App\Invoice;
use App\Product;
use App\Order;
use App\User;
use Carbon\Carbon;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Invoice::class, 10)->create();
        $invoices = [
            array(
                'name' => "Invoice 1", 
                'address' => "Test Address 1" , 
                'invoice_date' => Carbon::parse("2019-02-03"), 
                'invoice_number' => "15615113", 
                'due_date' => Carbon::parse("2019-12-30"), 
                'note' => "Lorem ipsum dolor sit amet.",
                'customer_id' => 1
            ),
            array(
                'name' => "Invoice 2", 
                'address' => "Test Address 2" , 
                'invoice_date' => Carbon::parse("2019-04-03"), 
                'invoice_number' => 156151193, 
                'due_date' => Carbon::parse("2019-12-30"), 
                'note' => "Lorem ipsum dolor sit amet.",
                'customer_id' => 1
            ),
            array(
                'name' => "Invoice 3",
                'address' => "Test Address 3" , 
                'invoice_date' => Carbon::parse("2019-12-02"), 
                'invoice_number' => 156155113, 
                'due_date' => Carbon::parse("2019-12-30"), 
                'note' => "Lorem ipsum dolor sit amet.",
                'customer_id' => 1
            ),
            array(
                'name' => "Invoice 4",
                'address' => "Test Address 4" , 
                'invoice_date' => Carbon::parse("2019-02-03"), 
                'invoice_number' => 156154113, 
                'due_date' => Carbon::parse("2019-12-30"), 
                'note' => "Lorem ipsum dolor sit amet.",
                'customer_id' => 1
            )

        ];

        foreach($invoices as $invoice) {
            Invoice::create($invoice);
        }
    }
}

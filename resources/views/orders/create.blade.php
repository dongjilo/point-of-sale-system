@extends('scaffholding-page')
@section('content')
<ol class="breadcrumb rounded p-2">
  <li class="breadcrumb-item">Cashier</li>
  <li class="breadcrumb-item active">Add new Order</li>
</ol>
@include('components.alertMessages')

             <div class="card">
                 <div class="card-body">
                 <form action="{{route('store_order')}}" method="post" enctype="multipart/form-data">
                 {{ csrf_field() }}
                   <div class="row">
                     <div class="col-xs-6 col-sm-12 col-md-12 col-lg-8">
                       <table id="orderTable" class="table table-bordered">
                         <thead>
                           <tr>
                             <th>Item ID</th>
                             <th>Product ID</th>
                             <th>Product Code</th>
                             <th>Product Name</th>
                             <th>Quantity</th>
                             <th>Subtotal</th>
                             <th>Operations</th>
                           </tr>
                         </thead>
                         <tbody id="tbody">
                         </tbody>
                       </table>
                   </div>
                 <div class="col-xs-6 col-sm-12 col-md-12 col-lg-4">
                       <h5 class="fw-bold">TOTAL: </h5>
                         <div class="row" id="select-center">
                           <div class="col-xs-6 col-sm-6 col-md-6">
                             <div class="form-floating">
                               <input type="text" class="form-control" name="product_input" id="product_input">
                               <label for="product_input">Input Product</label>
                             </div>
                           </div>
                           <div class="col-xs-6 col-sm-6 col-md-6">
                             <select class="form-select" name="product_name" id="product_name">
                               <option value="" selected disabled/>Select Product Here</option>
                             </select>
                           </div>
                         </div>
                           <div class="form-floating mt-3">
                             <input type="text" class="form-control" name="price" id="price" readonly/>
                             <label for="price">Price</label>
                           </div>
                           <div class="form-floating mt-3">
                             <input type="text" class="form-control" name="quantity" id="quantity">
                             <label for="quantity">Quantity</label>
                           </div>
                           <div class="form-floating mt-3">
                             <input type="text" class="form-control" name="discount" id="discount">
                             <label for="discount">Discount</label>
                           </div>
                           <a id="addToOrder" href="#" class="btn mt-3 btn-primary"><i class="fa fa-fw fa-arrow-left"></i>Add</a>
                           <a id="resetOrder" href="#" class="btn mt-3 btn-secondary"><i class="fa fa-fw fa-close"></i>Reset</a>
                           <a type="button" class="btn add mt-3 float-end" data-bs-toggle="modal" data-bs-target="#addBillingModal" ><i class="fa fa-fw fa-credit-card"></i> Billing</a>

                 </div>
               </form>
             </div>
       </div>
 @endsection

    @section('script')
        <script>
            $(document).ready(() => {
        let count=1;
        $('#addToOrder').click(function () {
            let dynamicRowHTML = `
            <tr class="rowClass"">
                <td class="row-index text-center">
                    ${count}
                </td>
                <td class="text-center">
                    <button class="btn btn-danger remove"
                        type="button"><i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>`;
            $('#tbody').append(dynamicRowHTML);
            count++;

            @php
                session()->forget('error');
                session('success', 'Item successfully added!');
            @endphp
        });

        // Removing Row on click to Remove button
        $('#tbody').on('click', '.remove', function () {
            $(this).parent('td.text-center').parent('tr.rowClass').remove();
        });
    })
        // Delete All row
        $('#resetOrder').click(function(){
            $("#orderTable").find("tr:gt(0)").remove();
        });
        </script>
    @endsection

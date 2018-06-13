      <div class="row">
            <div class="col-lg-12">

                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ti-layout-grid3"></i>  Payments    </h3>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="paymentsTbl">
                                <thead>
                                    <tr>
                                        <th>
                                            Tenant Name
                                        </th>
                                        <th>
                                            Payment Description
                                        </th> <th>
                                            Amount
                                        </th>
                                        <th>
                                            Payment Mode
                                        </th>
                                        <th>
                                            Payment Date
                                        </th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="editModal"role="dialog" >
            <div class="modal-dialog" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title"> <span id="aprtname"></span> Payment  Information</h4>
                    </div>
                    <form id="" role="form">
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="modal-body">

                            <input type="hidden" id="code" name="code"/>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Tenant Name</label>

                                <input type="text" class="form-control" name="name" readonly id="uptenant_name" >

                            </div>

                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Payment Date</label>

                                <input type="text" class="form-control" name="name" readonly id="uppayment_date" >

                            </div>  
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Total Amount Paid</label>

                                <input type="text" class="form-control" name="name" readonly id="upamount_paid" >

                            </div>       
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Description</label>

                                <input type="text" class="form-control" name="name" readonly id="updescription" >

                            </div>       
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Payment Mode</label>

                                <input type="text" class="form-control" name="name" readonly id="uppayment_mode" >

                            </div>    
                            <div id="updeposit" style="display: none">
                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Bank Name</label>

                                    <input type="text" class="form-control" name="name" readonly id="upbank" >

                                </div>
                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Bank Account</label>

                                    <input type="text" class="form-control" name="name" readonly id="upaccountno" >

                                </div>

                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Scanned Deposit Slip</label>

                                    <span id="updepositurl"></span>
                                </div>

                            </div>
                            <div id="upcheque" style="display: none">
                                <div class="form-group row col-md-12 ">
                                    <label  class=" control-label">Scanned Cheque SLip</label>

                                    <span id="upchequeurl"></span>
                                </div>   
                            </div>
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Cleared Code</label>

                                <input type="text" class="form-control" name="name" readonly id="clearedcode" >

                            </div>                    
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Created By</label>

                                <input type="text" class="form-control" name="name" readonly id="createdBy" >

                            </div>                       
                            <div class="form-group row col-md-12 ">
                                <label  class=" control-label">Created At</label>

                                <input type="text" class="form-control" name="name" readonly id="createdAt" >

                            </div>



                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="paymentshistTbl">
                                    <thead>
                                        <tr>
                                            <th>
                                                Payment Type
                                            </th>
                                            <th>
                                                Amount
                                            </th>
                                            <th>
                                                Start Date
                                            </th>
                                            <th>
                                                End Date
                                            </th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <div class="modal-footer">





                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal " id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                    <span class="loader-text">Wait...</span>
                </div>


            </div>
        </div>


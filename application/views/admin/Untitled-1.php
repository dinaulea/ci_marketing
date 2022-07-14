

<?php
function rupiah($angka){
    $hasil_rupiah = "Rp ".number_format($angka,2,',','.');
    return $hasil_rupiah;
}

?>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/bootstrap.css">
    
<link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/favicon.svg" type="image/x-icon">
    <script>
		window.print();
	</script>
<section class="invoice-add-wrapper">
                    <div class="row invoice-add">
                        <!-- Invoice Add Left starts -->
                        <div class="col-xl-9 col-md-8 col-12">
                            <div class="card invoice-preview-card">
                                <!-- Header starts -->
                                <div class="card-body invoice-padding pb-0">
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                                <h3 class="text-primary invoice-logo">CV Icommits Karya Solusi</h3>
                                            </div>
                                            JL. Pasir Subur No. 10, Kel. Ancol, Kec. Regol, Bandung 40254<br>
                                            info@icommits.co.id - www.icommits.co.id<br>
                                            081 990 300 100<br>
                                        </div>
                                        <?php foreach ($data_invoice->result_array() as $dp)
                                        {
			                            ?>
                                        <div class="invoice-number-date mt-md-0 mt-2">
                                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                                <h4 class="invoice-title">Invoice</h4>
                                                <div class="input-group input-group-merge invoice-edit-input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i data-feather="hash"></i>
                                                        </div>
                                                    </div>
                                                    <?=  $dp['no_invoice'] ?>
                                                </div>
                                            </div>
                                         
                                            <div class="d-flex align-items-center">
                                                <span class="title">Date: <?=  $dp['date'] ?></span>
                                             
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span class="title">Due Date: <?=  $dp['due'] ?></span>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             
                                <!-- Header ends -->

                                <hr class="invoice-spacing" />

                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row row-bill-to invoice-spacing">
                                        <div class="col-xl-8 mb-lg-1 col-bill-to pl-0">
                                            <h6 class="invoice-to-title">Invoice To:</h6>
                                            <div class="invoice-customer">
                                            <?=  $dp['nama_pelanggan'] ?>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 pr-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-1">Total Due:</td>
                                                        <td><strong>$12,110.55</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Bank name:</td>
                                                        <td>American Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Country:</td>
                                                        <td>United States</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">IBAN:</td>
                                                        <td>ETD95476213874685</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">SWIFT code:</td>
                                                        <td>BR91905</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->

                                <!-- Product Details starts -->
                                <div class="card-body invoice-padding invoice-product-details">
                                    <form class="source-item">
                                        <div data-repeater-list="group-a">
                                            <div class="repeater-wrapper" data-repeater-item>
                                                <div class="row">
                                                <table class="table mb-0" id = "rupiah">
                                <thead class="thead-dark">
                                    <tr>
                                       
                                        <th>Produk</th>
                                        <th>Price</th>
                                        <th>QTY</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <?php  $no = 1; foreach ($data_invoice->result_array() as $d) {?>
                                <tbody>
                                <tr>
                                    <td><?php echo $d['produk'] ?></td>
                                    <td><?php echo rupiah($d['price'])?></td>
                                    <td><?php echo $d['qty'] ?></td>
                                    <td><?php echo rupiah($d['price'] * $d['qty']) ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                            </table>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Add Left ends -->

                        <!-- Invoice Add Right starts -->
                       
                        <!-- Invoice Add Right ends -->
                    </div>

                    <!-- Add New Customer Sidebar -->
                    <div class="modal modal-slide-in fade" id="add-new-customer-sidebar" aria-hidden="true">
                        <div class="modal-dialog sidebar-lg">
                            <div class="modal-content p-0">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                <div class="modal-header mb-1">
                                    <h5 class="modal-title">
                                        <span class="align-middle">Add Customer</span>
                                    </h5>
                                </div>
                                <div class="modal-body flex-grow-1">
                                    <form>
                                        <div class="form-group">
                                            <label for="customer-name" class="form-label">Customer Name</label>
                                            <input type="text" class="form-control" id="customer-name" placeholder="John Doe" />
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="customer-email" placeholder="example@domain.com" />
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-address" class="form-label">Customer Address</label>
                                            <textarea class="form-control" id="customer-address" cols="2" rows="2" placeholder="1307 Lady Bug Drive New York"></textarea>
                                        </div>
                                        <div class="form-group position-relative">
                                            <label for="customer-country" class="form-label">Country</label>
                                            <select class="form-control" id="customer-country" name="customer-country">
                                                <option label="select country"></option>
                                                <option value="Australia">Australia</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United States of America">United States of America</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer-contact" class="form-label">Contact</label>
                                            <input type="number" class="form-control" id="customer-contact" placeholder="763-242-9206" />
                                        </div>
                                        <div class="form-group d-flex flex-wrap mt-2">
                                            <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Add</button>
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- /Add New Customer Sidebar -->
                </section>
<script src="<?php echo base_url();?>assets/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url();?>assets/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/pages/dashboard.js"></script>

<script src="<?php echo base_url();?>assets/assets/js/mazer.js"></script>

<div class="row">
    <h1>Checkout</h1>
<?php if(sizeof($this->cart->contents()) > 0){ ?>
    <div class="row">
        <h3>Customer Details</h3>
        <a hred="<?php echo base_url('account/editDetails'); ?>"><p>Edit Details</p></a>
        <div class="col-lg-6">
            <h4>Contact Details</h4>
            <table class="table table-responsive table-striped">
                <tr>
                    <td>Name:</td>
                    <td><?php echo $user->title . ' ' .  $user->forename . ' ' . $user->surname; ?>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><?php echo $user->phone; ?>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $user->email; ?>
                </tr>
            </table>
        </div>
        
        <div class="col-lg-6">
            <h4>Address</h4>
            <table class="table table-responsive table-striped">
                <tr>
                    <td>Address 1:</td>
                    <td><?php echo $user->address1; ?></td>
                </tr>
                <tr>
                    <td>Address 2:</td>
                    <td><?php echo $user->address2; ?></td>
                </tr>
                <tr>
                    <td>Town:</td>
                    <td><?php echo $user->town; ?></td>
                </tr>
                <tr>
                    <td>Postcode:</td>
                    <td><?php echo $user->postcode; ?></td>
                </tr>
                <tr>
                    <td>County:</td>
                    <td><?php echo $user->county; ?></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><?php echo $user->country; ?></td>
                </tr>
            </table>
        </div>
        
    </div>
    
    
    <div class="row">
    <h3>Product Information</h3>
    <table class="table table-responsive table-striped">
        <thead>
            <tr>
                <td>Product Name</td>
                <td>Quantity</td>
                <td>Price</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($this->cart->contents() as $item){ ?>
            <tr>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['qty']; ?></td>
                <td><?php echo "£" . number_format($item['price'], 2, '.', ''); ?></td>
                <td><a href="<?php echo base_url('product/deleteFromCart?rowid=' . $item['rowid']); ?>"></a></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>Total:</td>
                <td><?php echo "£" . number_format($this->cart->total(), 2, '.', ''); ?></td>
            </tr>
        </tfoot>
    </table>
    </div>
    
    
    <div class="row">
        <?php echo form_open('checkout/processCheckout', array('role' => 'form')); ?>
        <div class="col-lg-3">
            <?php if(isset($message)){echo $message;} ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="details_correct" id="details_correct" <?php echo set_checkbox('details_correct', false); ?>> I Agree My Details Are Correct.
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="terms_ageed" id="terms_ageed" <?php echo set_checkbox('terms_ageed', false); ?>> I Agree To The <a href="<?php echo base_url('page/terms'); ?>">Terms & Conditions</a>
                </label>
            </div>
        </div>
        <div class="col-lg-3">
            <input type="submit" class="btn btn-primary btn-block" value="Confirm & Pay Order" />
        </div>
        </form>
    </div>
<?php } else { ?>
    <h2>Sorry, Your Cart Is Empty!</h2>
<?php } ?>
</div>

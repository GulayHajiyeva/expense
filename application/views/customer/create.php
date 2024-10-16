<?php $this->load->view('head'); ?>

<div class="container">
    <form action="<?php echo site_url('customer/store'); ?>" method="post">
        <div class="form-group">
            <h2>User Details:</h2>
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name">
            <label for="phone">Phono number:</label>
            <input class="form-control" type="number" name="phone" id="phone">
        </div>

        <br>

        <button type="submit" class="btn btn-sm btn-primar">Send</button>
    </form>
</div>

<?php require APPROOT.'\views\inc\header.php'; ?>
    <div class="container">
        <div class="row">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <!-- <h1>Bring the todos here!</h1> -->
                <?php require_once APPROOT . '/views/lists/index.php'; ?>
            <?php else : ?>
               <!-- require the register here -->
                <?php require_once APPROOT . '/views/users/register.php'; ?>
            <?php endif; ?>
                
        </div>
    </div>
<?php require APPROOT. '\views\inc\footer.php'; ?>
    
    
<!-- <ul>
    <i class="fa fa-check"></i>
    <?php foreach($data['USERS'] as $USER) : ?>
        <li><?php echo "{$USER->NAME} {$USER->LASTNAME} {$USER->TODO}"; ?></li>
    <?php endforeach; ?>
</ul> -->
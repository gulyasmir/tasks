
    <div id="listInserts"></div>


<?php  isset($_COOKIE['page']) ? $page = $_COOKIE['page'] : $page =  1;  ?>
<nav>
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="<?php echo URL; ?>index?page=1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="<?php echo URL; ?>index?page=1">1</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo URL; ?>index?page=2">2</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo URL; ?>index?page=2">3</a></li>
        <li class="page-item">
            <a class="page-link" href="<?php echo URL; ?>index?page=1" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

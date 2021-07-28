<div class="container table-responsive" style="margin-top: 10px;">
    <?php if($numeropaginas>=1): ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php 
                    if ($pagina == 1) 
                    {
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <span aria-hidden="true"><i class="bi bi-arrow-left-circle"></i></span>
                            </a>
                        </li>
                         <?php 
                     }else{
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $link; ?>=<?php echo $pagina-1; ?>">
                                <span aria-hidden="true"><i class="bi bi-arrow-left-circle"></i></span>
                            </a>
                        </li>
                        <?php
                     }
                    for($i=1; $i <= $numeropaginas; $i++ )
                    {
                        if($pagina == $i)
                        {
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $link; ?>=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php 
                        }else{
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $link; ?>=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php 
                        }
                    }
                    if ($pagina == $numeropaginas) {
                        ?>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <span aria-hidden="true"><i class="bi bi-arrow-right-circle"></i></span>
                        </a>
                    </li>
                    <?php 
                    }else{
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $link; ?>=<?php echo $pagina+1; ?>">
                                <span aria-hidden="true"><i class="bi bi-arrow-right-circle"></i></span>
                            </a>
                        </li>
                        <?php 
                    }
                ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
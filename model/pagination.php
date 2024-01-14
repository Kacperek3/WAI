<?php
    echo '<div class="pagination">';
    for ($page = 1; $page <= $totalPages; $page++) {
        $pageClass = ($page == $current_page) ? 'current-page' : '';
        echo '<a href="?page=' . $page . '" class="page ' . $pageClass . '">' . $page . '</a>';
    }
    echo '</div>';
?>
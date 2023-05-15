<?php

class ToolTip
{
    static function DrawToolTip($msg)
    {
        echo '<i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip">
                    <span class="trd_tooltiptext">' . $msg . '</span>
             </i>';
    }
}

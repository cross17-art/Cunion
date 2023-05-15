<?php

class ToolTip
{
    static function DrawToolTip($msg, $additionalClasses = "")
    {
        echo '<i class="align-middle me-2 fas fa-fw fa-question-circle trd_tooltip ' . $additionalClasses . '">
                    <span class="trd_tooltiptext">' . $msg . '</span>
             </i>';
    }
}

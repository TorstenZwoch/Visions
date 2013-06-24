<?php

namespace Libetto\MaintenanceBundle\Grid\Export;

use APY\DataGridBundle\Grid\Export\Export;

class EXPExport extends Export {

    protected $fileExtension = 'exp';
    protected $mimeType = 'text/tab-separated-values';
    protected $delimiter = "\t";

    public function computeData($grid) {
        
        $this->content="***tmaster\n";
        $data = $this->getFlatGridData($grid);
        if(count($data)==0)return;
        foreach($data as $row_id=> $row){
            foreach ($row as $k=>$v){
                if($row_id==0){
                    $this->content .= $k.$this->delimiter;
                }else{
                    $this->content .= $v.$this->delimiter;
                }
            }
            $this->content .= "\n";
        }
    }

}

?>

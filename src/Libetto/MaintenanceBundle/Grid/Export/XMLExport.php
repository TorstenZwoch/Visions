<?php

namespace Libetto\MaintenanceBundle\Grid\Export;

use \APY\DataGridBundle\Grid\Export\Export as APY_Export;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;

class XMLExport extends APY_Export {
    protected $fileExtension = 'xml';
    protected $mimeType = 'application/xml';
    
    public function computeData($grid)
    {
        $xmlEncoder = new XmlEncoder();
        $xmlEncoder->setRootNodeName('master');
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('xml' => $xmlEncoder));

        $data = $this->getGridData($grid);

        $convertData['titles'] = $data['titles'];
        $convertData['rows']['row'] = $data['rows'];

        $this->content = $serializer->serialize($convertData, 'xml');
    }
}

?>

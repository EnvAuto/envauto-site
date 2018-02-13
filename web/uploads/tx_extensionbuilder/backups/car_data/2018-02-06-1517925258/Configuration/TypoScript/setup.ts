# the plugin. prefix indicates configuration dedicated for the TYPO3 frontend

plugin.tx_cardata_json {
    persistence {
        storagePid = {$plugin.tx_cardata.persistence.storagePid}
    #recursive = 1
    }
}

# the module. prefix indicates configuration dedicated for the TYPO3 backend
module.tx_cardata {
    persistence {
        storagePid = {$plugin.tx_cardata.persistence.storagePid}
    }
}

carJsonPage = PAGE
carJsonPage {
    config {
        disableAllHeaderCode = 1
        additionalHeaders = Content-Type: text/json
    }
    typeNum = 1513077042
    10 = USER
    10 {
        userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
        extensionName = CarData
        pluginName = Json
        vendorName = Envauto
    }
}
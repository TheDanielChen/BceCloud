<?php 
namespace Cstopery\BceCloud;

include 'BaiduBce.phar';
use Illuminate\Support\Facades\Config;
use BaiduBce\BceClientConfigOptions;
use BaiduBce\Util\Time;
use BaiduBce\Util\MimeTypes;
use BaiduBce\Http\HttpHeaders;
use BaiduBce\Services\Vca\VcaClient;
use BaiduBce\Services\Vcr\VcrClient;

class BceCloud {

    private function getClient($type = 'vcr'){

        $g_configs = [
            'credentials' => Config::get("BceCloud.credentials"),
            'endpoint' => Config::get("BceCloud.vcrEndpoint"),
        ];

        if($type == 'vcr'){

            return new VcrClient($g_configs);

        }elseif($type == 'vca'){
            $g_configs['endpoint'] = Config::get("BceCloud.vcaEndpoint");

            return new VcaClient($g_configs);

        }

        return ;

    }

    /**
     * Analyze a media with Source.
     *
     * @param $source string, source of media
     * example:
     * bos://{bucket}/{object}
     * vod://{mediaId}
     * @param array $options Supported options:
     *      {
     *          config: the optional bce configuration, which will overwrite the
     *                  default client configuration that was passed in constructor.
     *          preset: string, analyze preset name
     *          notification: string, notification name
     *      }
     * @return nothing
     * @throws BceClientException
     */
    public function vcaAnalyze($source, $options = [])
    {
        $client = $this->getClient('vca');   
        return $client->analyze($source, $options);
        
    }

    /**
     * add face image
     * @param $lib string, face lib name.
     * @param $brief string, brief name.
     * @param $image string, image url.
     * @param array $options Supported options:
     *      {
     *          config: the optional bce configuration, which will overwrite the
     *                  default client configuration that was passed in constructor.
     *      }
     * @return mixed nothing
     * @throws BceClientException
     */
    public function vcrAddFaceImage($lib, $brief, $image, $options = array())
    {

        $client = $this->getClient('vcr');
        
        return $client->addFaceImage($lib, $brief, $image, $options = array());
    }

}
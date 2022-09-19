<?php 

namespace SerpSDK;

/***
 * Shifter.io Google Scholar Cite Search SDK
 */
class SerpGoogleScholarCite extends SerpSDK {
    /**
     * The constructor
     *
     * @return void
     */
    public function __construct($api_key)
    {
        parent::__construct($api_key);
        $this->engine = 'google_scholar_cite';
        $this->api_url = 'https://serp.shifter.io/v1';
        $this->is_serp_api = true;
    }

    /**
     * Set parameter q
     * 
     * @param  string  $value  The citation that you are searching for (the query). 
     *
     * @return void
     */
    public function set_q($value)
    {
        if (gettype($value) != 'string') {
            throw new Exception('Paramter "q" is not of type "string"');
        }
        
        $this->params['q'] = $value;
    }

    /**
     * Set parameter device
     * 
     * @param  string  $value  The device used for your google search. Must be a value from ["desktop","mobile","tablet"]
     *
     * @return void
     */
    public function set_device($value)
    {
        if (gettype($value) != 'string') {
            throw new Exception('Paramter "device" is not of type "string"');
        }
        if (!in_array($value, ["desktop","mobile","tablet"])) {
            throw new Exception('Paramter "device" does not have a correct value');
        }
        $this->params['device'] = $value;
    }

    /**
     * Get parameter q
     *
     * @return string
     */
    public function get_q()
    {
        return $this->params['q'];
    }

    /**
     * Get parameter device
     *
     * @return string
     */
    public function get_device()
    {
        return $this->params['device'];
    }
}
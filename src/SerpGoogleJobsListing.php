<?php 

namespace SerpSDK;

/***
 * Shifter.io Google Jobs Listing Search SDK
 */
class SerpGoogleJobsListing extends SerpSDK {
    /**
     * The constructor
     *
     * @return void
     */
    public function __construct($api_key)
    {
        parent::__construct($api_key);
        $this->engine = 'google_jobs_listing';
        $this->api_url = 'https://serp.shifter.io/v1';
        $this->is_serp_api = true;
    }

    /**
     * Set parameter q
     * 
     * @param  string  $value  The terms that you are searching for (the query). 
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
     * Get parameter q
     *
     * @return string
     */
    public function get_q()
    {
        return $this->params['q'];
    }
}
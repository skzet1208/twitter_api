<?php
require "vendor/autoload.php";

namespace \Sample;

use Abraham\TwitterOAuth\TwitterOAuth;

/**
 * TwitterAPIをコールするクラス
 *
 * TwitterAPIを利用するための、簡易的なクラス。
 *
 * @category  Api
 * @package   Sample
 * @access    public
 * @author    Kai Suzuki <k.suzuki@histyle.co.jp>
 * @copyright 2018 Histyle inc
 */
class Twitter
{
    const CONSUMER_KEY = '';
    const CONSUMER_SECRET = '';

    /* @var twitter access tocken key */
    private $access_token = '';

    /* @var twitter access token secret */
    private $access_token_secret = '';

    /* @var twitter api */
    public $connection;

    /**
     * Constructer
     *
     * @param string $access_token
     * @param string $access_token_secret
     */
    public function __construct($access_token, $access_token_secret)
    {
        // setup
        $this->access_token        = $access_token;
        $this->access_token_secret = $access_token_secret;

        // connect
        $this->connection = new TwitterOAuth(
            CONSUMER_KEY,
            CONSUMER_SECRET,
            $this->access_token,
            $this->access_token_secret
        );
    }

    /**
     * Call API
     *
     * @param  string $api_reference_contents
     * @param  array  $params
     * @return json
     */
    public function get($api_reference_contents, $params = [])
    {
        return $this->connection->get($api_reference_contents, $params);
    }
}

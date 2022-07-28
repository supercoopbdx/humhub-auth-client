<?php
/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2016 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace yaalcoop\humhubauthclient;

use humhub\modules\user\authclient\interfaces\ApprovalBypass;
use humhub\modules\user\authclient\interfaces\SyncAttributes;

/**
 * OIDC authentication client
 *
 * @since 0.1
 */
class OIDC extends \yii\authclient\OpenIdConnect implements ApprovalBypass, SyncAttributes
{
    public $cssIcon = 'fa fa-sign-in';

    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
      return [
        'cssIcon' => $this->cssIcon,
        'buttonBackgroundColor' => '#4078C0',
      ];
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
      return [
        'id' => 'sub',
        'username' => 'sub',
        'firstname' => 'given_name',
        'lastname' => 'family_name',
        'email' => 'email',
      ];
    }

    /**
     * @inheritdoc
     */
    public function getSyncAttributes()
    {
        return ["firstname", "lastname", "email"];
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultName()
    {
        return $this->defaultName;
    }

    /**
     * {@inheritdoc}
     */
    protected function defaultTitle()
    {
        return $this->defaultTitle;
    }
}

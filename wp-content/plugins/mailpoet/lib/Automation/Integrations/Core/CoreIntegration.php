<?php declare(strict_types = 1);

namespace MailPoet\Automation\Integrations\Core;

if (!defined('ABSPATH')) exit;


use MailPoet\Automation\Engine\Integration;
use MailPoet\Automation\Engine\Registry;
use MailPoet\Automation\Integrations\Core\Actions\DelayAction;

class CoreIntegration implements Integration {
  /** @var DelayAction */
  private $delayAction;

  public function __construct(
    DelayAction $delayAction
  ) {
    $this->delayAction = $delayAction;
  }

  public function register(Registry $registry): void {
    $registry->addAction($this->delayAction);

    $registry->addFilter(new Filters\BooleanFilter());
    $registry->addFilter(new Filters\NumberFilter());
    $registry->addFilter(new Filters\IntegerFilter());
    $registry->addFilter(new Filters\StringFilter());
    $registry->addFilter(new Filters\EnumFilter());
    $registry->addFilter(new Filters\EnumArrayFilter());
  }
}

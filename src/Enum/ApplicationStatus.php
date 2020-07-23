<?php


namespace DevwareUK\V12Finance\Enum;


class ApplicationStatus {
  const ERROR = 0;
  const ACKNOWLEDGED = 1;
  const REFERRED = 2;
  const DECLINED = 3;
  const ACCEPTED = 4;
  const AWAITINGFULFILMENT = 5;
  const PAYMENTREQUESTED = 6;
  const PAYMENTPROCESSED = 7;
  const CANCELLED = 100;

  const LABELS = [
    self::ERROR => 'Error',
    self::ACKNOWLEDGED => 'Acknowledged',
    self::REFERRED => 'Referred',
    self::DECLINED => 'Declined',
    self::ACCEPTED => 'Accepted',
    self::AWAITINGFULFILMENT => 'Awaiting Fulfilment',
    self::PAYMENTREQUESTED => 'Payment Requested',
    self::PAYMENTPROCESSED => 'Payment Processed',
    self::CANCELLED => 'Cancelled',
  ];

  public static function getLabel($value) {
    return self::MAP[$value];
  }
}
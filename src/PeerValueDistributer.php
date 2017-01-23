<?php namespace jpuck;

class PeerValueDistributer {
    public static function distribute(array $values, int $maxDistribution = 3) : array
    {
        if ( count($values) < 2 ) {
            throw new InvalidArgumentException(
                "Cannot distribute less than 2 items."
            );
        }

        if ( $maxDistribution < 1 ) {
            throw new InvalidArgumentException(
                "Must distribute at least 1 item to each peer."
            );
        }

        return [];
    }
}

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

        $max = count($values) - 1;
        if ( $maxDistribution < $max ) {
            $max = $maxDistribution;
        }

        static::shuffle_assoc($values);
        foreach ( $values as $key => $value ) {
            $index []= [$key => $value];
        }
        // do it twice to give wrap-around circular pseudo-functionality
        foreach ( $values as $key => $value ) {
            $index []= [$key => $value];
        }

        $j = 0;
        while ( $max-- ) {
            $i = 0 + $j;
            foreach ( $values as $key => $value ) {
                $distribution[$key] = array_merge($distribution[$key] ?? [], $index[++$i]);
            }
            $j++;
        }

        return $distribution ?? [];
    }

    // http://php.net/manual/en/function.shuffle.php#94697
    public static function shuffle_assoc(&$array) {
        $keys = array_keys($array);

        shuffle($keys);

        foreach($keys as $key) {
            $new[$key] = $array[$key];
        }

        $array = $new;

        return true;
    }
}

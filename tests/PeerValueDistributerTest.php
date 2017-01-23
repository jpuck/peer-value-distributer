<?php

use jpuck\PeerValueDistributer;

class PeerValueDistributerTest extends PHPUnit_Framework_TestCase
{
    public function testCanRandomlyDistributePeerValuesEvenly()
    {
        $blogs = file_get_contents(__DIR__.'/data/userposts.json');
        $blogs = json_decode($blogs, true);

        for ( $count = 2; $count < count($blogs); ++$count ) {
            $distributer = new PeerValueDistributer($blogs, $count);
            $assignments = $distributer->distribute();

            foreach ( $blogs as $username => $post ) {
                $this->assertArrayHasKey(
                    $username, $assignments,
                    'Distribution does not contain user.'
                );
                $this->assertCount(
                    $count, $assignments[$username],
                    'Wrong number of distributions.'
                );
                $this->assertNotContains(
                    $post, $assignments[$username],
                    'Key assigned own value.'
                );
                $this->assertCount(
                    $count, array_unique($assignments[$username]),
                    'Duplicate values in distribution found.'
                );

                $reviews = 0;
                foreach ( $assignments as $assignment ) {
                    foreach ( $assignment as $review ) {
                        if ( $review === $post ) {
                            $reviews++;
                        }
                    }
                }
                $this->assertSame(
                    $count, $reviews,
                    'Wrong number of distributions for a value.'
                );
            }
        }
    }
}

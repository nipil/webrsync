<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use WRS\ChaCha20Block;

/**
 * @covers ChaCha20BlockTest
 */
final class ChaCha20BlockTest extends TestCase
{
    public function testCap() /* add ': void' in php 7.1 */
    {
        $this->assertEquals(0xFFFFFFFF, ChaCha20Block::cap(0x7FFFFFFFFFFFFFFF));
    }

    public function testRotLeft() /* add ': void' in php 7.1 */
    {
        $this->assertEquals(0xcc5fed3c, ChaCha20Block::rot_left(0x7998bfda, 7)); // rfc7539 2.1
    }

    public function testXor() /* add ': void' in php 7.1 */
    {
        $this->assertEquals(0x7998bfda, ChaCha20Block::xor(0x01020304, 0x789abcde)); // rfc7539 2.1
    }

    public function testAddCapWithoutOverlflow() /* add ': void' in php 7.1 */
    {
        $this->assertEquals(0x789abcde, ChaCha20Block::add_cap(0x77777777, 0x01234567)); // rfc7539 2.1
    }

    public function testAddCapWithOverlflow() /* add ': void' in php 7.1 */
    {
        $this->assertEquals(0x08888888, ChaCha20Block::add_cap(0x87777777, 0x81111111));
    }

    // set_const(int $index, int $value)
    public function testSetConstIndexValue() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // set_key_index_uint32(int $index, int $value)
    public function testSetKeyIndexValue() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // set_nonce_index_uint32(int $index, int $value)
    public function testSetNonceIndexValue() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // set_counter(int $position)
    public function testSetCounter() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // inc_counter(int $step = 1)
    public function testIncCounter() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // bin_to_internal(string $str, string $name, int $index, int $num)
    public function testBinToInternal() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // set_key(string $string)
    public function testSetKey() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // set_nonce(string $string)
    public function testSetNonce() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // do_quarter_round(int $i_a, int $i_b, int $i_c, int $i_d)
    public function testQuarterRound() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // compute_block()
    public function testComputeBlock() /* add ': void' in php 7.1 */
    {
        $this->assertTrue(TRUE);
    }

    // __construct(string $key=NULL, string $nonce=NULL, string $ctr=NULL)
    public function testConstructor() /* add ': void' in php 7.1 */
    {
        $c = new ChaCha20Block();
        $c->set_key(hex2bin("000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f"));
        $c->set_nonce(hex2bin("000000090000004a00000000"));
        $c->set_counter(1);
        $c->compute_block();
        $final = $c->get_state(ChaCha20Block::STATE_FINAL);
        echo $c;
        echo $final;
        $this->assertTrue(TRUE);
    }
}

// Exceptions
// self::rot_left(0, -1);
// $this->set_const_index_value(-1, 0);
// $this->set_key_index_value(-1, 0);
// $this->set_nonce_index_value(-1, 0);
// $this->bin_to_internal("toolong", "", 0, 0);
// $this->bin_to_internal("", "", -1, 0);
// $this->bin_to_internal("", "", 0, -1);
// $this->bin_to_internal("12345678901234567890123456789012", "", 0, 10*self::STATE_ARRAY_LENGTH);

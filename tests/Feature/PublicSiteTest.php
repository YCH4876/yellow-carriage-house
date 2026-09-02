<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicSiteTest extends TestCase
{
    public static function pageProvider(): array
    {
        return [
            'home' => ['/', 'Yellow Carriage House'],
            'policies' => ['/policies', null],
            'special events' => ['/special-events', null],
            'local attractions' => ['/local-attractions', null],
            'gathering room' => ['/gathering-room', null],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('pageProvider')]
    public function test_public_pages_load(string $uri, ?string $expectedText): void
    {
        $response = $this->get($uri);

        $response->assertOk();

        if ($expectedText !== null) {
            $response->assertSee($expectedText, false);
        }
    }

    public static function roomProvider(): array
    {
        return [
            'king lee' => ['/rooms/king-lee-suite', 'King Lee Suite'],
            'carriage house' => ['/rooms/the-carriage-house-apartment-suite', 'Carriage House'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('roomProvider')]
    public function test_offered_rooms_load(string $uri, string $expectedName): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertSee($expectedName, false);
    }

    public function test_windsor_queen_is_not_offered(): void
    {
        // Deliberately disabled. If this starts passing as 200, the route was
        // re-enabled without also restoring its homepage card.
        $this->get('/rooms/windsor-queen-suite-plus')->assertNotFound();
    }

    public static function redirectProvider(): array
    {
        return [
            ['/contact_us_inquiries_reservations', '/#contact'],
            ['/rooms_and_amenities', '/#rooms'],
            ['/local_attractions', '/local-attractions'],
            ['/special_events_weddings_and_receptions', '/special-events'],
            ['/gathering_room', '/gathering-room'],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('redirectProvider')]
    public function test_legacy_urls_redirect(string $from, string $to): void
    {
        $this->get($from)->assertRedirect($to);
    }

    public function test_footer_shows_the_current_year(): void
    {
        $this->get('/')->assertSee('Copyright &copy; '.date('Y'), false);
    }

    public static function pageWithPhoneProvider(): array
    {
        return [
            'home' => ['/'],
            'policies' => ['/policies'],
            'king lee' => ['/rooms/king-lee-suite'],
            'carriage house' => ['/rooms/the-carriage-house-apartment-suite'],
        ];
    }

    /**
     * The old number survived on the policies and room pages long after the
     * homepage was corrected - including on the "Book your stay" button, which
     * is the page's main call to action. The original version of this test only
     * checked the homepage, so it passed the whole time. Check every page that
     * carries a number, and check the tel: links as well as the visible text:
     * a link can dial something different from what it displays.
     */
    #[\PHPUnit\Framework\Attributes\DataProvider('pageWithPhoneProvider')]
    public function test_pages_show_only_the_current_contact_number(string $uri): void
    {
        $this->get($uri)
            ->assertOk()
            ->assertDontSee('536-5338', false)
            ->assertDontSee('tel:5025365338', false);
    }

    public function test_contact_numbers_and_their_links_agree(): void
    {
        foreach (['/', '/policies', '/rooms/king-lee-suite'] as $uri) {
            $html = $this->get($uri)->assertOk()->getContent();

            $this->assertStringContainsString('tel:5028024310', $html,
                "$uri should link to the current number");

            // Every tel: link on the page must point at the current number.
            preg_match_all('/tel:(\d+)/', $html, $matches);
            $this->assertNotEmpty($matches[1], "$uri should have at least one tel: link");
            foreach (array_unique($matches[1]) as $dialled) {
                $this->assertSame('5028024310', $dialled,
                    "$uri has a tel: link dialling $dialled");
            }
        }
    }

    public function test_removed_auth_routes_are_gone(): void
    {
        foreach (['/login', '/register', '/dashboard', '/profile', '/forgot-password'] as $uri) {
            $this->get($uri)->assertNotFound();
        }
    }
}

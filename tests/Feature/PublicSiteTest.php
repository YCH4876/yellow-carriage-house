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

    public function test_homepage_shows_the_current_contact_number(): void
    {
        // Regression guard: the repo once carried a stale number that would
        // have been republished over the correct one.
        $this->get('/')
            ->assertSee('802-4310', false)
            ->assertDontSee('536-5338', false);
    }

    public function test_removed_auth_routes_are_gone(): void
    {
        foreach (['/login', '/register', '/dashboard', '/profile', '/forgot-password'] as $uri) {
            $this->get($uri)->assertNotFound();
        }
    }
}

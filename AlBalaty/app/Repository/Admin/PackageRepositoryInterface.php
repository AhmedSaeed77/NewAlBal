<?php


namespace App\Repository\Admin;


use Illuminate\Http\Request;

interface PackageRepositoryInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function packagesQuery(Request $request);

    /**
     * @param array $package_id
     * @param int|null $limit
     * @param bool $onlyActive
     * @return mixed
     */
    public function batchPackage(array $package_id, int $limit = null, bool $onlyActive = false);

    /**
     * @param int $limit
     * @return mixed
     */
    public function recent(int $limit = 6);

    /**
     * @param $package_identifier
     * @return mixed
     */
    public function singlePackage($package_identifier);


    /**
     * @param int $package_id
     * @param int $part_id
     * @return mixed
     */
    public function packagePartVideos(int $package_id, int $part_id);

    /**
     * @param string $country_code
     * @return mixed
     */
    public function getPartsByCountry(string $country_code = null);

    /**
     * @param int $user_id
     * @param int|null $limit
     * @return mixed
     */
    public function getUserPackages(int $user_id, int $limit = null);

    /**
     * @param int|null $limit - limiting packages count
     * @return mixed
     */
    public function getCurrentUserPackages(int $limit = null);

    /**
     * @param int $user_id
     * @param int|null $package_id
     * @return mixed
     */
    public function getUserActiveSubscriptions(int $user_id, int $package_id = null);

    /**
     * @param int|null $package_id
     * @return mixed
     */
    public function getCurrentUserActiveSubscriptions(int $package_id = null);


    /**
     * @param int $package_id
     * @return mixed
     */
    public function checkCurrentUserSubscription(int $package_id);

    /**
     * @param int $user_id
     * @param int $package_id
     * @return mixed
     */
    public function renewPackageSubscription(int $user_id, int $package_id);

    /**
     * @return mixed
     */
    public function userPackagesMaterials();

    /**
     * @param int $material_id
     * @return mixed
     */
    public function hasMaterial(int $material_id);
}

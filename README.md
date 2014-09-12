Alma Mock Service
========================

This app emulates most of the alma behavior, used in ding2tal based
instances.

The service is based on Symfony2 framework, so some special
setup is required when deploying this app.

By default, the app contains a sql dump with a single user,
couple of reservations, loans and debts.

User credentials are 1111110022/5555 (login/pass).

Installation
========================

1. Clone this repository;

2. Copy the `app/config/parameters.yml.dist` file to
   `app/config/parameters.yml`;

3. Edit this file according to your settings.
   Normally, only database specific settings are required;

4. Edit the `web/reset.php` file if reseting service data
   to it's initial state is planned to be used (useful for unit-testing);

5. Create a virtual host, pointing to repo root(!), not `web` directory;

6. Being in the app root, run this command:
   `php app/console cache:clear -e prod`
   This will clear the cache and make the app accessible in the web;

7. Make sure `app/cache` and `app/logs` directories have write permissions
   for all (i.e. `chmod -R 777`);

8. Create the database, with the name provided in the config
   in steps (2) and (4). Import the data dump located in
   `src/Provider/AlmaBundle/dummy_alma.sql`

8. Access the `http://HOST_NAME/web`.
   There should be initial page with all supported requests and
   examples of usage.
   Same url is used when setting the provider url in ding2tal instance;

9. To reset the database state, ie. restore the data to it's initial
   state, run `http://HOST_NAME/web/reset.php`
   The script returns nothing. It just imports the dump again into the database.
   This is safe to be called via `curl` or `file_get_contents()`;

Note
========================

Existing instance located at http://alma.am.ci.inlead.dk/web/

Renewing loans is not supported, for now.

When reserving a periodical, the reservations list in ding2tal user
profile page will show `Title not available` as item title.
This happens because alma has it's own internal mechanism of relating items
to reservations, this cannot be normally achieved.

Item availability is returned random on every request.

Item details (holdings) are hard-cached. Each item has it's own pre-defined
XML response located in `src/Provider/AlmaBundle/Resources/alma_xml` directory.
Each file name is `ITEM_LOCAL_ID.xml`.
To add a new entry there follow the
`http://ALMA_PROVIDER_URL:PORT/alma/catalogue/detail?catalogueRecordKey=ITEM_LOCAL_ID`
url in your browser, copy the XML response and create a xml file with those contents
in the path described above.
For items that do not have this pre-defined response, the service will return
that this id is not found.

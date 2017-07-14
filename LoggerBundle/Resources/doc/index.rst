Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

.. code-block:: bash

    $ composer require kaliber5/logger-bundle

TBD...


Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the ``app/AppKernel.php`` file of your project:

.. code-block:: php

    <?php
    // app/AppKernel.php

    // ...
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...

                new Kaliber5\LoggerBundle\Kaliber5LoggerBundle(),
            );

            // ...
        }

        // ...
    }


Step 2: Use the Logger
----------------------

Your Service can use the ``Kaliber5\LoggerBundle\LogginTrait\Loggintrait`` - Trait. In
your service-definition you can tag your service with the ``k5.logger.logging`` to get the logger injected
You can optional log to a channel by using the ``monolog.logger``-tag.

.. code-block:: yml
# ..
services:
    your-service:
    # ..
        tags:
            - { name: k5.logger.logging }
            - { name: 'monolog.logger', channel: 'my-channel' } # optional, to log in a given channel


Then in your class you can use methods like ``$this->logDebug($message)`` to simplify logging.

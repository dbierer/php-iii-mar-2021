#include <phpcpp.h>

// function declaration with parameters
void telemetryParams (Php::Parameters &params)
{
    std::integer distance=params[0];
    std::integer speed=params[1];
    std::cout<<"Distance: "<<distance<<std::endl;
    std::cout<<"Speed: "<<speed<<std::endl;
}

// function declaration without parameters
Php::Value telemetryRandom()
{
    if (rand() % 2 == 0) {
        return "no remainder";
    } else {
        return "remainder";
    }
}

// Tell the compiler that the get_module is a pure C function
extern "C" {
    /**
     *  Function that is called by PHP right after the PHP process
     *  has started, and that returns an address of an internal PHP
     *  structure with all the details and features of your extension
     *
     *  This creates an extension object that is memory-resident during runtime.
     */
    PHPCPP_EXPORT void *get_module() {
        static Php::Extension extension("telemetry", "0.0.1");
        extension.add<telemetryParams>("telemetryParams", {
            Php::ByVal("a", Php::Type::Numeric),
            Php::ByVal("b", Php::Type::Numeric)
        });
        extension.add<telemetryRandom>("telemetryRandom");
        return extension;
    }
}